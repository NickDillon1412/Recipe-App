<div x-data="{ open: false }" @click.away="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div class="absolute z-20 rounded-lg bg-white shadow-md py-2 mt-1" x-show="open">
        {{ $slot }}
    </div>
</div>