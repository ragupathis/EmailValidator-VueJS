<template>
  <div id="app">
    <img src="https://www.email-checker.com/wp-content/uploads/Email-Checker-Logo-Large-PNG-1.png">
    <h1>{{ msg }}</h1>
    <div>
    <input type="text" v-on:keyup.enter = "validateEmail" id="email" v-model="email" v-on:keyup="email_typing" placeholder="someone@gmail.com" v-bind:style="email_style_obj"/>
    <button id="submit"  v-on:click="validateEmail"> Check </button>
    <p id="input_email">Email : {{email}}</p>

    <p id="response">Email Status : {{emailStatus}}</p>
    </div>

  </div>
</template>

<script>

import axios from 'axios';


export default {
  name: 'app',
  data () {
    return {
      msg: 'Welcome to Email Checker',
      email:"email@x.com",
      emailStatus:"Yet to check",
      email_style_obj:{
          height: "50px",
          width: "300px",
      }
    }
  },
  methods:{
  email_typing: function(){
    //this.emailStatus="Ready to check";
    console.log("typing");
  },
  validateEmail: function () {
    //this.loading = true;
    this.emailStatus="Pending";
    axios.post("http://localhost/email_checker/email_check.php",this.email, {headers: {
    'Content-type': 'application/x-www-form-urlencoded',
    }}).then((response)  =>  {
      console.log("success");
      console.log(response.data);
      this.emailStatus=response.data;
    }, (error)  =>  {
      //this.loading = false;
      alert("Sorry., Error occurred. Try again");
    })
  }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

#email{
font-size: 20px;
}

#submit{
height:50px;
width:100px;
font-size:20px;
}
</style>
