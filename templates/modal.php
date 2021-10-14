        <button id="open">
            Hacer Click
        </button>
          
        <div id="modal_container" class="modal-container">
            <div class="modal">
              <h1>Ventana Modal</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque assumenda dignissimos illo explicabo natus quia repellat, praesentium voluptatibus harum ipsam dolorem cumque labore sunt dicta consectetur, nesciunt maiores delectus maxime?
              </p>
              <button id="close">Cerrar</button>
            </div>
        </div>

        <script>
            const open = document.getElementById('open');
            const modal_container = document.getElementById('modal_container');
            const close = document.getElementById('close');

            open.addEventListener('click', () => {
            modal_container.classList.add('show');  
            });

            close.addEventListener('click', () => {
            modal_container.classList.remove('show');
            });
        </script>