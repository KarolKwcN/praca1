<template>
  <v-layout row>
    <v-flex xs12 sm6 offset-sm3>
      <v-card class="chat-card" dark="">
        <v-list>
          <v-subheader
            >
              Group Chat
            </v-subheader>
            <v-divider></v-divider>
            <v-list-tile
             
            >

           <v-layout 
          
           >
             <v-flex>
               <v-layout column>
                  <v-flex>
                    <span class="small font-italic"></span>
                  </v-flex>

                  <v-flex>
                    <v-chip
                      
                      text-color="white"
                    >

                      <v-list-tile-content >
                        
                      </v-list-tile-content>
                    </v-chip>
                  </v-flex>

                  <v-flex class="caption font-italic">
                    
                  </v-flex>
               </v-layout>
             </v-flex>
           </v-layout>


            </v-list-tile>
        </v-list>
      </v-card>




    </v-flex>


      <v-footer
      height="auto"
      fixed
      color="grey"
      >
      <v-layout row >
        <v-flex xs6 offset-xs3 justify-center align-center>
            <v-text-field
              rows=2
              v-model="message"
              label="Enter Message"
              single-line
             
            ></v-text-field>
        </v-flex>

        <v-flex xs2> 
            <v-btn 
              
             dark class="mt-3 ml-2 white--text" small color="green">send</v-btn>
        </v-flex>
      </v-layout>


    </v-footer>
  </v-layout>
</template>



<style scoped>
.chat-card{
  margin-bottom:140px;
}
</style>