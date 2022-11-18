<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data['title']; ?></title>
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/ticked.css'; ?>">
</head>

<body>
  <div class="contenedor">
    <div class="datos-empresa">
      <img src="<?php echo BASE_URL . 'assets/images/logo.png'; ?>" alt="">
    </div>
    <div class="datos-empresa">
      <p class="mobreempresa"><?php echo $data['empresa']['nombre']; ?></p>
      <p>Ruc: <?php echo $data['empresa']['ruc']; ?></p>
      <p>Cel: <?php echo $data['empresa']['telefono']; ?></p>
      <p><?php echo $data['empresa']['direccion']; ?></p>
    </div>
    <p class="mensaje">:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</p>
    <h5 class="title">DATOS DEL CLIENTE</h5>
    <p class="mensaje">:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</p>
    <div class="datos-info">
      <p><strong><?php echo $data['venta']['identidad']; ?>: </strong> <?php echo $data['venta']['num_identidad']; ?>
      </p>
      <p><strong>Nombre: </strong> <?php echo $data['venta']['nombre']; ?></p>
      <p><strong>Teléfono: </strong> <?php echo $data['venta']['telefono']; ?></p>
    </div>
    <p class="mensaje">:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</p>
    <h5 class="title">DETALLE DE PRODUCTOS</h5>
    <p class="mensaje">:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</p>

    <div class="contenedor-tabla">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Cant</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>SubTotal</th>
        </tr>
      </thead>
      <tbody class="mensaje">
        <?php
            $productos = json_decode($data['venta']['productos'], true);
            foreach ($productos as $producto) { ?>
        <tr>
          <td><?php echo $producto['cantidad']; ?></td>
          <td><?php echo $producto['nombre']; ?></td>
          <td><?php echo number_format($producto['precio'], 2); ?></td>
          <td><?php echo number_format($producto['cantidad'] * $producto['precio'], 2); ?></td>
        </tr>
        <?php } ?>       
        <tr>
          <td class="text-rightt" colspan="3">Descuento</td>
          <td class="text-rightt"><?php echo number_format($data['venta']['descuento'], 2); ?></td>
        </tr>
        <tr>
          <td class="text-right" colspan="3">Total con descuento</td>
          <td class="text-right"><?php echo number_format($data['venta']['total'] - $data['venta']['descuento'], 2); ?>
          </td>
        </tr>
        <tr>
          <td class="text-right" colspan="3">Total sin descuento</td>
          <td class="text-right"><?php echo number_format($data['venta']['total'], 2); ?></td>
        </tr>
      </tbody>
    </table>  
    </div>  
    <p class="mensaje">:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::</p>
    <div class="mensaje">
      <h4>COMPRA AL <?php echo $data['venta']['metodo'] ?></h4>
      <?php echo $data['empresa']['mensaje']; ?>
      <?php if ($data['venta']['estado'] == 0) { ?>
      <h1>Venta Anulado</h1>
      <?php } ?>
    </div>
  </div>
  <div>
    <p class="moreweb">Powered by MoreWeb</p>
  </div>
</body>
</html>