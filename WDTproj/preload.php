<style>

.preloadlayer {
  width: 100%;
  height: 1800px;
  display: grid;
  grid-template-columns: 1fr;
  background-color: black;
  position:absolute;
  z-index: 99;
  transition: 1.5s;
}

.preloadlayer .preloadlogo {
  background-image: url("images/logo.png");
  background-repeat: no-repeat;
  margin-left: 38%;
  margin-top: 25%;
  position: fixed;
  min-width: 500px;
  min-height:300px;
}

@media screen and (max-width:700px) {
  .preloadlayer .preloadlogo {
    margin-left:20%;
    margin-top: 40%;
  }

}



</style>


<div id="fadeout" class="preloadlayer">
  <div class="preloadlogo">
</div>
</div>
