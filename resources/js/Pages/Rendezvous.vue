<template>
<div>

<div class="wrapper">
<div class="container pt-5">
<div class="row">
<div class="col-lg-3">
<form>
 <div class="form-group">
    <label for="date">Date Rendez vous</label>
    <input type="date" class="form-control" id="date"  placeholder="Enter Date" v-model="date_revo">
     </div>
  <div class="form-group">
    <label for="time">Time</label>
    <input type="time" class="form-control" id="time" aria-describedby="emailHelp" placeholder="Enter Time" v-model="time">
     </div>
  <div class="form-group">
   <!--<input type="text" v-model="idpersonne">
   -->
 <div class="dropdown"  >
   <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Nome de patient
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" v-model="idpersonne"   v-for="personne in personnes":key="personne.id">{{personne.name}}</a>
   
  </div> </div>

  </div>

  
  <button type="submit" class="btn btn-primary" @click="addRendezvous">Submit</button>
</form>
</div>

</div>
</div>
</div>
</div>
</template>
<script>
export default{
      
data(){
    return{
    date_revo:'',
    time:'',
    idpersonne:'',
    personnes:{}
    }
},
  created(){
           axios.get('http://127.0.0.1:8000/api/getPersonnes')
         .then(response=>this.personnes=response.data)
         .catch(error=>console.log('error'));
        },
methods:{

  addRendezvous(){
      axios.post("http://127.0.0.1:8000/api/addRendezvous",{
          date_revo:this.date_revo,
          time:this.time,
          idpersonne:this.idpersonne


      }).then(response=>console.log(response))
      .catch(error=>console.log(error))
        }

}

}

</script>