<?= require ('../templates/Header.php'); ?>
<?= require ('../templates/Menu.php'); ?> 


    <div class="main-panel">
    <?= require ('../templates/nav.php'); ?>
    
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Ayuda</h4>
                  <p class="card-category">Información Complementaria </p>
                </div>
                <div class="card-body"> 
                <br><br>
                <p align="center"> MANEJO DE LA VENTANA DE CLIENTES</p>
                <p align="justify"> 1. Si usted desea ingresar clientes a la base de clic en el botón REGISTRO </p>
                <p align="justify"> Se abrirá la siguiente ventana  </p>
                <img  style= "text-align:center" src="../assets/img/ventNCliente.jpg" />
                <br><br>
                <p align="justify"> 2. Introduzca los datos llenando respectivamente los campos </p>
                <p align="justify"> 3. Si no llegase a llenar todos los campos el sistema le notificara que faltan campos de completar </p>
                <p align="justify"> 4. Una vez lleno pulse en el botón guardar o si lo desea pulse en el botón cancelar</p>
                <p align="justify"> 5. El sistema regresara a la ventana principal de cliente y podrá observar que el el cliente ha sido ingresado a la base de datos  </p>
                <p align="justify"> Si usted llegase a requerir la modificación de algun cliente ingresado previamente a la base de datos seguira los siguientes pasos:  </p>
                <p align="justify"> 1. Se ubicará en la última columna de la tabla la cual lleva por nombre opcines  </p>
                <p align="justify"> 2. Dará clic sobre la imagen de lápiz  <img src='../assets/img/icons/edit.png' width='20' /> </p> 
                <p align="justify"> Aparecerá la siguiente ventana  con los datos respectivo del cliente que desea modificar </p>
                <img  style= "text-align:center" src="../assets/img/VAYU1.jpg" />
                <br><br>
                <p align="justify"> 3. Deberá identificar el campo que desea modificar   </p>
                <p align="justify"> 4. Una vez editado procede a guardar la información dando clic en el botón GUARDAR</p>
                <p align="justify"> Si usted quisiera eliminar algun cliente ingresado deberá seguir los siguientes pasos:  </p>
                <p align="justify"> 1. Se ubicará en la última columna de la tabla la cual lleva por nombre opcines  </p>
                <p align="justify"> 2. Dará clic sobre la imagen de basurero  <img src='../assets/img/icons/delete.png' width='20' /> </p> 
                <p align="justify"> El sistema le preguntara por la confirmación de la eliminación del cliente donde tendrá que pulsar ACEPTAR y el dato se eliminará automáticamente</p>
              
                <br><br><br><br>
                <p align="center"> MANEJO DE LA VENTANA DE PRODUCTOS</p>
                <p align="justify"> 1. Si usted desea ingresar productos a la base de clic en el botón REGISTRO </p>
                <p align="justify"> Se abrirá la siguiente ventana  </p>
                <img  style= "text-align:center" src="../assets/img/VAYU2.jpg" />
                <br><br>
                <p align="justify"> 2. Introduzca los datos llenando respectivamente los campos </p>
                <p align="justify"> 3. Si no llegase a llenar todos los campos el sistema le notificara que faltan campos de completar </p>
                <p align="justify"> 4. Una vez lleno pulse en el botón guardar o si lo desea pulse en el botón cancelar</p>
                <p align="justify"> 5. El sistema regresara a la ventana principal de producto y podrá observar que el el cliente ha sido ingresado a la base de datos  </p>
                <p align="justify"> Si usted llegase a requerir la modificación de algún producto ingresado previamente a la base de datos seguira los siguientes pasos:  </p>
                <p align="justify"> 1. Se ubicará en la última columna de la tabla la cual lleva por nombre opcines  </p>
                <p align="justify"> 2. Dará clic sobre la imagen de lápiz  <img src='../assets/img/icons/edit.png' width='20' /> </p> 
                <p align="justify"> Aparecerá la siguiente ventana  con los datos respectivo del producto que desea modificar </p>
                <img  style= "text-align:center" src="../assets/img/AYU3.jpg" />
                <br><br>
                <p align="justify"> 3. Deberá identificar el campo que desea modificar   </p>
                <p align="justify"> 4. Una vez editado procede a guardar la información dando clic en el botón GUARDAR</p>
                <p align="justify"> Si usted quisiera eliminar algún producto ingresado deberá seguir los siguientes pasos:  </p>
                <p align="justify"> 1. Se ubicará en la última columna de la tabla la cual lleva por nombre opcines  </p>
                <p align="justify"> 2. Dará clic sobre la imagen de basurero  <img src='../assets/img/icons/delete.png' width='20' /> </p> 
                <p align="justify">  El dato se eliminará automáticamente</p>
                 
                <br><br><br><br>
                <p align="center"> MANEJO DE LA VENTANA DE REPORTESTES/p>
                
                <p align="justify"> Se abrirá la siguiente ventana  </p>
                <img  style= "text-align:center" src="../assets/img/AYU4.jpg" />
                <br><br>
                <p align="justify"> 2. Deberá dirijirse a la columna de opciones donde esta el icono de la impresora <img src='../assets/img/icons/imprimir.png' width='25'  /></p>
                <p align="justify"> 3. Hará clic en la fila que de see generar un reporte  </p>
                <p align="justify"> 4. una vez elegido el reporte y echo clic aparecerá una vista del reporte requerido como un documento pdf</p>
                
                
                <br><br>

                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      <?= require ('../templates/footer_pg.php'); ?>
    </div>
<?= require ('../templates/Footer.php'); ?>