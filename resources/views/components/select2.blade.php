

<div wire:ignore>
    <select class="select2-{{$this->id}} {{$this->class ?? ''}}" @if($this->multiple) multiple="multiple" @endif >
        @foreach($this->options as $key => $option)
            <option value="{{$key}}" @if($key == $this->model) selected @endif>{{$option}}</option>
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
                var data = $(this).select2("val")
                @this.select2Change(data)
            })
        }
    })
</script>
