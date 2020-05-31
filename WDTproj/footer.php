<style>
.footer {
  left:0;
  bottom:0;
  width:100%;
  height: 40vh;
  background-color: #333;
  overflow:hidden;
}

.footer .top {
  position: absolute;
  margin-top: -52px;
  margin-left: 47%;
  transition: 1s;
}

@media screen and (max-width:600px) {
  .footer .top {
    margin-left: 40%;
  }
}

.footer .top:hover{
 transform: translateY(-10px);
 cursor: pointer;
}

</style>

<div class="footer">
  <div onclick="topFunction()" class="top">
<img src="images/pagetop.png">
</div>
</div>

<script>

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


</script>
