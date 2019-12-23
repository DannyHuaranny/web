   <?php include('Layouts/header.php'); ?>

    <nav aria-label="breadcrumb" id="breadcrumb" role="navigation">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Eventos</li>
            </ol>
        </div>
    </nav>
    <section class="page">
        <div class="page-header">
            <div class="container">
                <h1>Eventos</h1>
                <p class="lead page-description">Eventos del colegio.</p>
            </div>
        </div>
        <div class="wrap">
            <div class="content">
                <main class="fullpage">
                    <table id="dataTable" class="" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="3"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                foreach ($datos as $dato) {
                $id= $dato["idevento"];
                $evento= $dato["evento"];
                $fecha= $dato["fecha"];        
            ?>
                            <tr>
                            <td>
                            <?php  echo $evento;?>
                        </td>
                        <td>
                            <?php  echo $fecha;?>
                        </td>
                        <td>
                            sn
                        </td>
                            </tr>
                            
                            <?php
                   
                }
            ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
      <?php include('Layouts/footer.php'); ?>