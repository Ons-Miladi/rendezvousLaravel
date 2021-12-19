<template>
<div class="wrapper">
<div class="container pt-5">
<div class="row">
<div class="col-lg-3">
<form>
 <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"  placeholder="Enter Name" v-model="name">
     </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
     </div>
  <div class="form-group">
    <label for="date">Date de naissance</label>
    <input type="date" class="form-control" id="date" placeholder="date naissance" v-model="date_naissance">
  </div>
  <div class="form-group">
    <label for="sexe">Sexe</label>
    <input type="text" class="form-control" id="sexe" placeholder="sexe" v-model="sexe">
  </div>
 
  <div class="form-group">
    <label for="numero">Numero Télephone</label>
    <input type="tel" class="form-control" id="numero" placeholder="Numero Télephone" v-model="numero_tel">
  </div>
  
  
  
  <button type="submit" class="btn btn-primary" @click="addPersonne">Submit</button>
</form>
</div>
<div class="col-lg-9">
<table class="table">
  <thead class="thead-dark">
    <tr>
    
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Sexe</th>
      <th scope="col">Numero Télephone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
    <tr v-for="personne in personnes":key="personne.id">
     
      <td>{{personne.email}}</td>
      <td>{{personne.name}}</td>
      <td>{{personne.date_naissance}}</td>
      <td>{{personne.sexe}}</td>
      <td>{{personne.numero_tel}}</td>
      <td><button class="btn btn-secondary" @click="supprimer(personne.id)">Delete</button></td>
    <td><button class="btn btn-danger" @click="getPersonneById(personne.id)"  data-toggle="modal" data-target="#exampleModal">Edit</button></td>
    <edit-Personne v-bind:perToEdit="perToEdit" @perupdate="refresh"></edit-Personne>
    </tr>
    
  
  </tbody>
</table>

</div>
</div>
</div>
</div>
</template>
<script>
export default{
   data(){
       return{
           personnes:{},
          email:'',
          name:'',
          date_naissance:'',
          sexe:'',
          numero_tel:'',
          perToEdit:''
          


       }
   },
     created(){
           axios.get('http://127.0.0.1:8000/api/getPersonnes')
         .then(response=>this.personnes=response.data)
         .catch(error=>console.log('error'));
        },
   methods:{
     
       addPersonne(){
       axios.post("http://127.0.0.1:8000/api/addPersonne",{
           name:this.name,
           email:this.email,
           date_naissance:this.date_naissance,
           sexe:this.sexe,
           numero_tel:this.numero_tel})
       .then(response=>console.log(response.data))
       .catch(error=>console.log(error))
   },
   supprimer(id){
       axios.delete("http://127.0.0.1:8000/api/SupprimerPersonne/"+id)
       .then(response=>this.personnes=response.data)
       .catch(error=>console.log(error))
   },
   getPersonneById(id){
      axios.get("http://127.0.0.1:8000/api/getPersonneByID/"+id)
      .then(response=>this.perToEdit=response.data)
      .catch(error=>console.log(error))

   },
   refresh(personnes){
       this.personnes=personnes.data;
   }
   }

}
</script>