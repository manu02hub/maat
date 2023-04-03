<template>
  <div class="shadow-lg rounded-sm border px-5 py-4" :class="item.type === 'Featured' ? 'bg-amber-50 border-amber-300' : 'bg-white border-slate-200'">
      <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
          <!-- Left side -->
          <div class="flex items-start space-x-3 md:space-x-4">
              <div class="w-9 h-9 shrink-0 mt-1">
                  <img class="w-9 h-9 rounded-full" :src="item.image" width="36" height="36" :alt="item.company" />
              </div>
              <div>
                  <router-link class="inline-flex font-semibold text-slate-800" :to="item.link">{{item.role}}</router-link>
                  <div class="text-sm">{{item.details}}</div>
              </div>
          </div>
          <!-- Right side -->
          <div class="flex items-center space-x-4 pl-10 md:pl-0">
              <div class="text-sm text-slate-500 italic whitespace-nowrap">{{item.date}}</div>
              <div v-if="item.type" class="text-xs inline-flex font-medium rounded-full text-center px-2.5 py-1" :class="item.type === 'Featured' ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600'">{{item.type}}</div>
              <button :class="item.fav ? 'text-amber-500' : 'text-slate-300 hover:text-slate-400'">
                  <span class="sr-only">Bookmark</span>
                  <svg class="w-3 h-4 fill-current" width="12" height="16" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2 0C.9 0 0 .9 0 2v14l6-3 6 3V2c0-1.1-.9-2-2-2H2Z" />
                  </svg>
              </button>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  name: 'JobListItem',
  props: ['item'],
}
</script>