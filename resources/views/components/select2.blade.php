

<div wire:ignore>
    <select class="select2-{{$this->id}}">
        @foreach($this->options as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
</div>



<script>
    document.addEventListener('DOMContentLoaded', () => {
        prepareSelect2()
        document.addEventListener('livewire-select2-init', () => {
            prepareSelect2()
        })

        function prepareSelect2(){
            $('.select2-{{$this->id}}').select2().on('change', function(e) {
                var data = $(this).select2("data")[0].text // get the value of the data selected.
                @this.select2Change(data) // emit the data back to the user defined function
            })
        }
    })
</script>
