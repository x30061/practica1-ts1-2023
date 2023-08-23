<?php
require_once 'sql-usuario.php';

try { $pdo = new PDO($attr, $user, $pass, $opts); } 
catch (PDOException $e) { throw new PDOException($e->getMessage(), (int) $e->getCode()); }

header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['codigo'])) 
{
    $codigo = limpiar_get($pdo, 'codigo');
    $cursos = array(); 
	recolectar($pdo,$cursos,$codigo);

    $jsonData = json_encode($cursos);
    echo $jsonData;
}
function recolectar(&$pdo, &$cursos, &$cod) 
{
	$query1 = "SELECT * FROM cursos WHERE codigo=$cod";
    $c = $pdo->query($query1)->fetch();
	if($c)
	{
		$fueAgregado = agregar($c,$cursos); // no debe estar repetido
		if($fueAgregado)
		{
			$query2 = "SELECT requisito FROM requisitos WHERE curso=$cod";
			$requisitos = $pdo->query($query2);
			while($r = $requisitos->fetch())
			{
				recolectar($pdo, $cursos, $r['requisito']);
			}
		}
	}
}
function agregar(&$c, &$cursos) 
{
    $existe = array_search($c,$cursos);
    if($existe == false) { $cursos[] = $c; }
    return !$existe;
}

function limpiar_get($pdo, $var)
{
    return $pdo->quote($_GET[$var]);// .quote() escape any quotes that a hacker may have inserted
}

?>