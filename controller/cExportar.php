<?php



$archivo = new DOMDocument(); 
$archivo->formatOutput = true; 
$departamentos = $archivo->createElement('departamentos'); 
$departamentos = $archivo->appendChild($departamentos); 
$arrayDepartamentos = Departamento::buscaDepartamentosPorDescripcion('', null, null, null);
$fechaHoy = date('Ymd');
for ($numDepartamentos = 0; $numDepartamentos < count($arrayDepartamentos); $numDepartamentos++) {
    $departamento = $archivo->createElement('departamento'); 
    $departamento = $departamentos->appendChild($departamento); 
    $CodDepartamento = $archivo->createElement('T02_CodDepartamento', $arrayDepartamentos[$numDepartamentos]->getCodDepartamento()); 
    $CodDepartamento = $departamento->appendChild($CodDepartamento); 
    $DescDepartamento = $archivo->createElement('T02_DescDepartamento', $arrayDepartamentos[$numDepartamentos]->getDescDepartamento()); 
    $DescDepartamento = $departamento->appendChild($DescDepartamento); 
    $FechaCreacion = $archivo->createElement('T02_FechaCreacionDepartamento', $arrayDepartamentos[$numDepartamentos]->getFechaCreacionDepartamento()); 
    $FechaCreacion = $departamento->appendChild($FechaCreacion); 
    $VolumenNegocio = $archivo->createElement('T02_VolumenDeNegocio', $arrayDepartamentos[$numDepartamentos]->getVolumenDeNegocio()); 
    $VolumenNegocio = $departamento->appendChild($VolumenNegocio); 
    $FechaBaja = $archivo->createElement('T02_FechaBajaDepartamento', $arrayDepartamentos[$numDepartamentos]->getFechaBajaDepartamento()); 
    $FechaBaja = $departamento->appendChild($FechaBaja); 
}
$archivo->saveXML();
if ($archivo->save("tmp/" . $fechaHoy . "Departamentos.xml") != 0) {
    header('Content-Type: text/xml');
    header("Content-Disposition: attachment; filename=" . $fechaHoy . "Departamentos.xml");
    readfile("tmp/" . $fechaHoy . "Departamentos.xml");
    $_SESSION['pagina'] = 'mtoDepartamentos';
}

?>