<template>
  <div>
       <div class="">
         {{ question }}
       </div>
       <div class="" v-for="option in options">
         <input style="margin-right:15px" :name="option.name" type="radio" :v-model="option.model" :value="option.val" @change="changeValue"><span>{{ option.tag }}</span>
       </div>
       <div class="">
         <p v-if="selectedValue==correct">Correc Answer!</p>
       </div>
   </div>
</template>

<script>
    export default {
      props: ['name','model','val','tag1','tag2','tag3','tag4', 'question', 'correct','answered','path'],
        data: function() {
            return {
                selectedValue: "",
                isAnswered: '',
                options: [
                  {name: this.name, model: this.model, val:'0', tag: this.tag1},
                  {name: this.name, model: this.model, val:'1', tag: this.tag2},
                  {name: this.name, model: this.model, val:'2', tag: this.tag3},
                  {name: this.name, model: this.model, val:'3', tag: this.tag4},
                ],
            }
        },
        mounted() {
            this.isAnswered = this.isAnswer ? true : false;
        },
        computed: {
            isAnswer() {
                return this.answered;
            },
        },

        methods: {
          changeValue: function(newValue) {
              this.selectedValue = newValue.target.value;
              console.log(newValue.target.name);
              axios.get(this.path+newValue.target.name+'/'+newValue.target.value)
                  .then(response => this.isAnswered = true)
                  .catch(response => console.log(response.data));
          }
        }
    }
</script>
