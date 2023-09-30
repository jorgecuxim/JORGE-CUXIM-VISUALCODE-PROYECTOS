<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <!-- ========== Bootstrap Icons ========== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
    include("../../../includes/header_admin.php");
    ?>
  </header>
  <main>
    <div class="container mt-5">
      <h2>Tickes</h2>
      <div class="row justify-content-center align-item-center h-100">
        <div class="col-12 col-sm-12 col-md-10">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Cliente</th>
                      <th scope="col">Administradore</th>
                      <th scope="col">Area</th>
                      <th scope="col">Nivel</th>
                      <th scope="col">Estatus</th>
                      <th scope="col">fecha_creacion</th>
                      <th scope="col">fecha_cerrado</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require("../../../includes/db.php");

                    $query = "SELECT nombre_cliente, nombre_administrador, nombre_area, nombre_nivel, nombre_estatus, fecha_creacion, fecha_cerrado FROM ticket INNER JOIN cliente ON ticket.id_cliente = cliente.id_cliente INNER JOIN administrador ON ticket.id_administrador = administrador.id_administrador INNER JOIN area ON ticket.id_area = area.id_area INNER JOIN nivel ON ticket.id_nivel = nivel.id_nivel INNER JOIN estatus ON ticket.id_estatus = estatus.id_estatus";

                    $ejecutar = mysqli_query($connection, $query);

                    $contador = 1;

                    while ($fila = mysqli_fetch_array($ejecutar)) {

                      ?>
                      <tr>
                        <td>
                          <?php echo $contador; ?>
                        </td>
                        <td>
                          <?php echo $fila[ 'nombre_cliente' ]; ?>
                        </td>
                        <td>
                          <?php echo $fila[ 'nombre_administrador' ]; ?>
                        </td>
                        <td>
                          <?php echo $fila[ 'nombre_area' ]; ?>
                        </td>
                        <td>
                          <?php
                          if ($fila[ 'nombre_nivel' ] == 'Urgente') {
                            echo '<span class="badge bg-danger text-light">';
                            echo $fila[ 'nombre_nivel' ] . "</span>";
                          } elseif ($fila[ 'nombre_nivel' ] == 'Alto') {
                            echo '<span class="badge bg-warning text-dark">';
                            echo $fila[ 'nombre_nivel' ] . "</span>";
                          } elseif ($fila[ 'nombre_nivel' ] == 'Medio') {
                            echo '<span class="badge bg-info text-light">';
                            echo $fila[ 'nombre_nivel' ] . "</span>";
                          } elseif ($fila[ 'nombre_nivel' ] == 'Bajo') {
                            echo '<span class="badge bg-success text-light">';
                            echo $fila[ 'nombre_nivel' ] . "</span>";
                          }
                          ?>
                        </td>
                        <td>
                        <?php
                          if ($fila[ 'nombre_estatus' ] == 'Cerrado') {
                            echo '<span class="badge bg-success text-light">';
                            echo $fila[ 'nombre_estatus' ] . "</span>";
                          } elseif ($fila[ 'nombre_estatus' ] == 'Pausado') {
                            echo '<span class="badge bg-secondary text-dark">';
                            echo $fila[ 'nombre_estatus' ] . "</span>";
                          } elseif ($fila[ 'nombre_estatus' ] == 'Proceso') {
                            echo '<span class="badge bg-primary text-light">';
                            echo $fila[ 'nombre_estatus' ] . "</span>";
                          } elseif ($fila[ 'nombre_estatus' ] == 'Abierto') {
                            echo '<span class="badge bg-warning text-dark">';
                            echo $fila[ 'nombre_estatus' ] . "</span>";
                          }
                          ?>
                        </td>
                        <td>
                          <?php echo $fila[ 'fecha_creacion' ]; ?>
                        </td>
                        <td>
                          <?php echo $fila[ 'fecha_cerrado' ]; ?>
                        </td>
                        <td><a href="./view/update_form.php?id=<?php echo $fila[ 'id_nivel' ]; ?>"><i
                              class="bi bi-eye-fill text-primary"></i></a></td>
                      </tr>
                      <?php $contador++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</body>

</html>