<template>
<div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
 <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter Name" v-model="perToEdit.name">
     </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="perToEdit.email">
     </div>
  <div class="form-group">
    <label for="date">Date de naissance</label>
    <input type="date" class="form-control" id="date" placeholder="date naissance" v-model="perToEdit.date_naissance">
  </div>
  <div class="form-group">
    <label for="sexe">Sexe</label>
    <input type="text" class="form-control" id="sexe" placeholder="sexe" v-model="perToEdit.sexe">
  </div>
 
  <div class="form-group">
    <label for="numero">Numero Télephone</label>
    <input type="tel" class="form-control" id="numero" placeholder="Numero Télephone" v-model="perToEdit.numero_tel">
  </div>
  
  
  
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" data-dismiss="modal" class="btn btn-primary" @click="update()">Save changes</button>
      </div>
    </div>
  </div>
</div>



</div>
</template>
<script>
export default{
props:['perToEdit'],
methods:{
    update(){
        axios.patch("http://127.0.0.1:8000/api/updatePersonne/"+this.perToEdit.id,
        {name:this.perToEdit.name,
        email:this.perToEdit.email,
        numero_tel:this.perToEdit.numero_tel,
        sexe:this.perToEdit.sexe,
        date_naissance:this.perToEdit.date_naissance
        }
        )
        .then(response=>this.$emit('perupdate',response))
        .catch(error=>console.log(error))
    }
}

}
</script>