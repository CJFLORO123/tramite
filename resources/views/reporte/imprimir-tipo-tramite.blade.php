<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Documentos</title>
</head>
<style>
    
    table{
      
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;
	   
    }
    
  header img {
        width: 200px;
		margin: -35;
		position:absolute; 
        right: 88%
    }

    h2{
      font-size: 16;
      text-align: center;  
      font-family: arial, Monospace;
    }
    
    th{
        border: 1px solid #566573;
        color: #FFFFFF ;
        padding: 8px;
        font-size: 12px;
        background-color: #2D5F8B ;
        text-align: center;
    }
    
    td{
        border: 1px solid #566573;
        padding: 8px;
        font-size: 12px;
        text-align: center;
    }

    p{
        line-height: 3px;
        text-align: center;
        font-size: 13px;
        margin: -9;
    }
  
</style>

<body>
	<header>
     <h2><u>REPORTES DE TIPO TRÁMITE DE DOCUMENTOS</u></h2>
     <!--<img src="{{ asset('/storage/images/logo.png') }}" class="img-general" alt="logo AFOSECAT"> -->
	 </header>
    <br/>	
    <table>
            <tr> 
              <th>N° Registro</th>
              <th>Fecha  y Hora</th>
              <th>N° de Documento</th>
              <th>Solicitante</th>
              <th>Tipo Documento</th>
              <th>Empresa o Institución</th>
              <th>Asunto</th>
              <th>Tipo Trámite</th>
            </tr>
        @foreach( $Reportes As $s)
       <tr>
           <td>{{ $s->num_recepcion }} - {{ $s->indice }}</td>
           <td>{{ $s->fecha_recepcion }} - {{ $s->hora_recepcion }}  </td>
           <td>{{ $s->num_documento }} </td>
           <td>{{ $s->nom_solicitante }}</td>
           <td>{{ $s->nombre_tipoDocumento }} </td>
           <td>{{ $s->nombre_empresa }} </td>
           <td>{{ $s->asunto }} </td>
           <td>{{ $s->tipo_tramite }} </td>
       </tr>
       @endforeach  
    </table>
</body>
</html>
