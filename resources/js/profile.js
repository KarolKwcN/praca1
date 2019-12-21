require('./bootstrap');
window.Vue = require('vue');
const app = new Vue({
    el: '#app_message',
    data: {
   msg: 'lalala:',
   content: '',
   privateMsgs: [],
   singleMsgs: [],
   users: [],
   msgFrom:'',
   conID: '',
   user_id: '',
   seen: false,
   newMsgFrom: ''

 

 },

 ready: function(){
   this.created();

 },

 created(){
   axios.get('/getMessages')
        .then(response => {
          console.log(response.data); // show if success
          app.privateMsgs = response.data;
          //app.users = response.data;  //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
 },


 methods:{
   messages: function(id){
     axios.get('/getMessages/' + id)
          .then(response => {
            console.log(response.data); // show if success
          app.singleMsgs = response.data;
          app.conID = response.data[0].conversation_id; //we are putting data into our posts array
           
          })
          .catch(function (error) {
            console.log(error); // run if we have error
          });
   },

   inputHandler(e){
     if(e.keyCode ===13 && !e.shiftKey){
       e.preventDefault();
       this.sendMsg();
     }
   },
   sendMsg(){
     if(this.msgFrom){
       axios.post('/sendMessage', {
              conID: this.conID,
              msg: this.msgFrom
            })
            .then( (response) => {              
              console.log(response.data); // show if success
             
              if(response.status===200){
                app.singleMsgs = response.data;
              }

            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
     }
   },
   userID: function(id){
    app.user_id = id;
  },

  sendNewMsg(){
    axios.post('/sendNewMessage', {
      user_id: this.user_id,
           msg: this.newMsgFrom,
         })
         .then(function (response) {
           console.log(response.data); // show if success
           if(response.status===200){
             window.location.replace('/wiadomosci');
             app.msg = 'your message has been sent successfully';
           }

         })
         .catch(function (error) {
           console.log(error); // run if we have error
         });
  }
   }

});