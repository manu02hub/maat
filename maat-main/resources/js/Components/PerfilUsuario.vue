<template>
    <div class="grow">
      <!-- Panel body -->
      <div class="p-6 space-y-6">
        <h2 class="text-2xl text-slate-800 font-bold mb-5">Mi Usuario</h2>
        <!-- Picture -->
        <section>
          <div class="flex items-center">
            <div class="mr-4">
              <img class="w-20 h-20 rounded-full" src="https://definicion.de/wp-content/uploads/2019/07/perfil-de-usuario.png" width="80" height="80" alt="User upload" />
            </div>
            <button class="btn border-slate-200 hover:border-slate-300 shadow-sm text-indigo-500">Cambiar Foto</button>
          </div>
        </section>
        <!-- Business Profile -->
        <section>
          <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Perfil Usuario</h3>
          <div class="text-sm">Pequeña descripción del usuario</div>
          <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
            <div class="sm:w-1/3">
              <label class="block text-sm font-medium mb-1" for="name">Nombre</label>
              <input id="name" class="form-input w-full" type="text" />
            </div>
            <div class="sm:w-1/3">
              <label class="block text-sm font-medium mb-1" for="business-id">Nickname</label>
              <input id="business-id" class="form-input w-full" type="text" />
            </div>
            <div class="sm:w-1/3">
              <label class="block text-sm font-medium mb-1" for="location">Localidad</label>
              <input id="location" class="form-input w-full" type="text" />
            </div>
          </div>
        </section>
        <!-- Email -->
        <section>
          <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Email</h3>
          <!--<div class="text-sm">Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia.</div>-->
          <div class="flex flex-wrap mt-5">
            <div class="mr-2">
              <label class="sr-only" for="email">Email</label>
              <input id="email" class="form-input" type="email" />
            </div>
            <button class="btn border-slate-200 hover:border-slate-300 shadow-sm text-indigo-500">Cambiar</button>
          </div>
        </section>
        <!-- Password -->
        <section>
          <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Password</h3>
          <!-- <div class="text-sm">You can set a permanent password if you don't want to use temporary login codes.</div> -->
          <div class="mt-5">
            <button class="btn border-slate-200 shadow-sm text-indigo-500">Establecer nueva contraseña</button>
          </div>
        </section>
        <!-- Smart Sync -->
        <section>
          <h3 class="text-xl leading-snug text-slate-800 font-bold mb-1">Eventos asistidos:</h3>
          <div class="text-sm">"Aquí aparecerá un listado"</div>
        </section>
      </div>
      <!-- Panel footer -->
      <footer>
        <div class="flex flex-col px-6 py-5 border-t border-slate-200">
          <div class="flex self-end">
            <button class="btn border-slate-200 hover:border-slate-300 text-slate-600">Cancel</button>
            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">Save Changes</button>
          </div>
        </div>
      </footer>
    </div>  
  </template>
  
  <script>
  import { ref } from 'vue'
  
  export default {
    name: 'AccountPanel',
    setup() {
  
    const sync = ref('Off')
  
      return {
        sync,
      }
    }
  }
  </script>