<x-dynamic-component 
  :component="$getFieldWrapperView()" 
  :id="$getId()" 
  :label="$getLabel()" 
  :label-sr-only="$isLabelHidden()" 
  :helper-text="$getHelperText()"
  :hint="$getHint()" 
  :hint-action="$getHintAction()" 
  :hint-color="$getHintColor()" 
  :hint-icon="$getHintIcon()" 
  :required="$isRequired()" 
  :state-path="$getStatePath()"
>

  <div 
    class="flex items-stretch w-full"
    x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer, }"
  >
    <input  type="text" x-model="state" 
        class="flex-1 shadow-sm outline-none transition duration-75 focus:ring-1 focus:ring-inset disabled:opacity-70 border-gray-300 focus:border-primary-500 focus:ring-primary-500"
        style="border-top-left-radius: .5rem; border-bottom-left-radius: 0.5rem"
        x-bind:class="{
                'border-gray-300 focus:border-primary-500 focus:ring-primary-500': ! (
                    @js($getStatePath()) in $wire.__instance.serverMemo.errors
                ),
                'dark:border-gray-600 dark:focus:border-primary-500':
                    ! (@js($getStatePath()) in $wire.__instance.serverMemo.errors) && @js(config('forms.dark_mode')),
                'border-danger-600 ring-danger-600 focus:border-danger-500 focus:ring-danger-500':
                    @js($getStatePath()) in $wire.__instance.serverMemo.errors,
                'dark:border-danger-400 dark:ring-danger-400 dark:focus:border-danger-500 dark:focus:ring-danger-500':
                    @js($getStatePath()) in $wire.__instance.serverMemo.errors && @js(config('forms.dark_mode')),
        }">
      <div class="" x-data="{
        select(value) {
          this.state = value;
          $refs.panel.close();
        },
      }">
        <button 
        x-on:click="$refs.panel.toggle"
        type="button" 
        class="flex justify-center rounded-r-lg  items-center border border-gray-300 p-2">
          <x-dynamic-component :component="$getIcon()" class="text-primary-500 h-6 w-6"></x-dynamic-component>
        </button>
      <div 
        x-ref="panel"
        x-cloak
        x-float.placement.bottom-end.flip.teleport.offset="{ offset: 8 }"
        x-transition:enter-start="scale-95 opacity-0"
        x-transition:leave-end="scale-95 opacity-0"
        class="absolute max-h-64 overflow-scroll z-10 w-full divide-y divide-gray-100 rounded-lg bg-white shadow-lg ring-1 ring-black/5 transition max-w-[20rem]"
      >
          @foreach($getOptions() as $option)
          <div 
            x-on:click="select(@js($option))"
            class="py-2 px-4 cursor-pointer hover:bg-gray-100">
              {{ $option }}
            </div>
          @endforeach
        </div>
      </div>
  </div>
</x-dynamic-component>
