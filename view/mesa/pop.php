<style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}



/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}


.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

.delete {
    right: 25px;
    color: #00f;
    font-size: 25px;
    font-weight: bold;
}
.delete:hover,.delete:focus {
    color: #f00;
    cursor: pointer;
}

.modal-cont-delete{
	 margin: 15% auto 12% auto;
}
/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
label{
	margin-left:24px;
	font-weight:bold;
}
</style>
</style>

<div id="modal-wrapper" class="modal">
  
  <div class="modal-content animate" >
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Fechar">&times;</span>
      <h3 style="text-align:center;">Produtos</h3>
    </div>

    <div id="edit" class="container">
      	  
    </div>
    
  </div>
  
</div>

<div id="modal-deletar" class="modal">
  
  <div class="modal-content animate modal-cont-delete" >
        
    <div class="imgcontainer">
      <h5 style="text-align:center;">Tem certeza que dezeja excluir este produto?</h5>
    </div>
    <div id="edit" class="container"  style="text-align:center;">
      	 <input id="buttomsim" type="buttom" value="Sim" class="btn btn-primary">
		 <input type="buttom" value="Não" class="btn btn-primary" onclick="document.getElementById('modal-deletar').style.display='none'">
		 
    </div>
    
  </div>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>