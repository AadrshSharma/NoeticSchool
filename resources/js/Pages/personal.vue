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
        </div>
        <div>
          <label  class="block mb-1 text-gray-600 font-semibold">Email</label>
          <input v-model="email" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
        </div>
        <div>
          <label class="block mb-1 text-gray-600 font-semibold">Phone</label>
          <input v-model="phone" type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />

        </div>
        </div>
        <div>
          <label  class="block mb-1 text-gray-600 font-semibold">Country</label>
            <select v-model="country" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionCountry" :value="item.id" :key="item.id">{{ item.country_name }}</option>
                </select>
        </div>

        <div>
          <label class="block mb-1 text-gray-600 font-semibold">State</label>
            <select v-model="state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionState" :value="item.id" :key="item.id">{{ item.country_name }}</option>
                </select>
        </div>
        <div>
          <label for="email" class="block mb-1 text-gray-600 font-semibold">City</label>
           <select v-model="city" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option selected value="">Select One</option>
                <option v-for="item in optionCity" :value="item.id" :key="item.id">{{ item.country_name }}</option>
                </select>
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
                </div>
      <button class="mt-4 w-full bg-yellow-500 font-semibold py-2 rounded-md  tracking-wide">Register</button>
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
    }
},



}
// tailwind.config.js

</script>
<style src="@vueform/multiselect/themes/default.css"></style>
