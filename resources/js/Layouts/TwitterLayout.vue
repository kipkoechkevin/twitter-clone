<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Twitter from 'vue-material-design-icons/Twitter.vue';
import Magnify from 'vue-material-design-icons/Magnify.vue';
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue';
import Feather from 'vue-material-design-icons/Feather.vue';
import Close from 'vue-material-design-icons/Close.vue';
import ChevronDown from 'vue-material-design-icons/ChevronDown.vue';
import Earth from 'vue-material-design-icons/Earth.vue';
import ImageOutline from 'vue-material-design-icons/ImageOutline.vue';
import FileGifBox from 'vue-material-design-icons/FileGifBox.vue';
import Emoticon from 'vue-material-design-icons/Emoticon.vue';
import ArrowLeft from 'vue-material-design-icons/ArrowLeft.vue';
import MenuItem from "@/Components/MenuItem.vue";

</script>

<template>
   <div class="fixed w-full">
       <div class="flex mx-auto max-w-[1400px]">
           <div class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto">
               <div class="p-2 px-3 mb-4">
                   <Twitter fill-color="#FFFFFF" :size="37" />
               </div>
                <MenuItem iconString="Home"/>
                <MenuItem iconString="Explore"/>
                <MenuItem iconString="Notifications"/>
                <MenuItem iconString="Messages"/>
                <MenuItem iconString="Profile"/>

               <button class="lg:w-full mt-8 ml-2 text-white font-extrabold text-[22px
                              bg-[#1C9CEF] p-3 px-3 rounded-full cursor-pointer">
                   <span class="lg:block hidden">Tweet</span>
                   <span class="block lg:hidden"><Feather /></span>
               </button>
           </div>
       </div>
   </div>
</template>

<style>
    body{
        background-color: #15202B;
    }
</style>
