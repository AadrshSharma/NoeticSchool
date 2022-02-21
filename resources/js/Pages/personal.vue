<template>
<div class="h-screen bg-slate-50 flex justify-center items-center w-full">
  <form>
    <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
      <img class="h-14 mb-4 mx-auto" src="https://d3ag9sk63msume.cloudfront.net/project-assets/images/noetic_logo.png" alt="">
      <div class="space-y-4">
        <!-- <h1 class="text-center text-2xl font-semibold text-gray-600">Register</h1> -->
        <div>
          <label  class="block mb-1 text-gray-600 font-semibold">Username</label>
          <input v-model="name" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
          <span v-if="errors.name" class="text-xs text-red-500 py-1">{{ errors.name[0] }}</span>
        </div>
        <div>
          <label  class="block mb-1 text-gray-600 font-semibold">Email</label>
          <input v-model="email" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
          <span v-if="errors.email" class="text-xs text-red-500 py-1">{{ errors.email[0] }}</span>
        </div>
        <div>
          <label class="block mb-1 text-gray-600 font-semibold">Phone</label>
          <input v-model="phone" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
          <span v-if="errors.phone" class="text-xs text-red-500 py-1">{{ errors.phone[0] }}</span>

        </div>
        </div>
        <div>
          <label  class="block mb-1 text-gray-600 font-semibold">Country</label>
            <select v-model="country" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionCountry" :value="item.id" :key="item.id">{{ item.country}}</option>
                </select>
          <span v-if="errors.country_id" class="text-xs text-red-500 py-1">{{ errors.country_id[0] }}</span>

        </div>

        <div>
          <label class="block mb-1 text-gray-600 font-semibold">State</label>
            <select v-model="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionState" :value="item.id" :key="item.id">{{ item.state}}</option>
                </select>
          <span v-if="errors.state_id" class="text-xs text-red-500 py-1">{{ errors.state_id[0] }}</span>

        </div>
        <div>
          <label for="email" class="block mb-1 text-gray-600 font-semibold">City</label>
           <select v-model="city" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionCity" :value="item.id" :key="item.id">{{ item.city}}</option>
                </select>
          <span v-if="errors.city_id" class="text-xs text-red-500 py-1">{{ errors.city_id[0] }}</span>

        </div>
        <div>
          <label for="email" class="block mb-1 text-gray-600 font-semibold">Skills</label>
        <div>
                    <Multiselect
                    v-model="multiselect_example"
                    :options="optionSkill"
                    mode="tags"
                    placeholder="Select one or more"
                    :searchable="true"
                    :createTag="true"
                    />
                </div> 
                <span v-if="errors.skills" class="text-xs text-red-500 py-1">{{ errors.skills[0] }}</span>
      
                </div>
      <button type="submit"  @click.prevent="submit" class="mt-4 w-full bg-yellow-500 font-semibold py-2 rounded-md  tracking-wide">Register</button>
    </div>
  </form>
</div>
</template>

<script>
import Multiselect from '@vueform/multiselect';
export default {
name:'personal',
components: {Multiselect},
data(){
    return{
            name:'',
            email:'',
            phone:'',
            country:'',
            state:'',
            city:'',
            tags:'tags',
            multiselect_example:[],
            optionSkill:[],
            optionCountry:[],
            optionState:[],
            optionCity:[],
            errors:{}
    }
},
methods:{
  fetchData(){
     axios.post('/api/country/').then(response => {
             if(response.status === 200) {
                 this.optionCountry = response.data.data
             
                 }
               })
                 axios.post('/api/skill/').then(response => {
             if(response.status === 200) {
                 this.optionSkill = response.data.data.map(a => ({
                     value: a.id,
                     label: a.name
                 }))
             
                    }
                 })
          },
  fetchState(){
    axios.post('/api/state/'+ this.country).then(response => {
                   if(response.status === 200) {
                  this.optionState = response.data.data
             
                 }
        })
  },
  fetchCity(){
    axios.post('/api/city/'+ this.state).then(response => {
                   if(response.status === 200) {
                  this.optionCity = response.data.data
             
                 }
        })
  } ,
  submit(){
    const payload={
      name:this.name,
      email:this.email,
      phone:this.phone,
      country_id:this.country,
      state_id:this.state,
      city_id:this.city,
      skills:this.multiselect_example
    }
    axios.post('api/create',payload).then(response =>{
      if(response.status === 200){
                   this.$inertia.get('personalv');
                }
      }).catch((error) => {
                    if (error.response.status === 422){
                        this.errors = error.response.data.errors
                    }
                    
                })
    }
},
created(){
  this.fetchData();
},
watch:{
  'country':{
    handler:'fetchState'
  },
  'state':{
    handler:'fetchCity'
  }
}


}
// tailwind.config.js

</script>
<style src="@vueform/multiselect/themes/default.css"></style>
