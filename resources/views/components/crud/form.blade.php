<div>
    @foreach($input as $item)

        @if($item['element'] === 'input')
            <div class="form-group row">
                <label for="{{$item['id']}}"
                       class="col-sm-3 text-end control-label col-form-label">{{$item['label']}}</label>
                <div class="col-sm-9">
                    <input type="{{$item['type']}}"
                           class=" form-control {{$item['class']}}"
                           id="{{$item['id']}}"
                           name="{{$item['name']}}"
                           value="{{$item['value']}}"
                           placeholder="{{$item['placeholder']}}">
                </div>
            </div>
        @elseif($item['element'] === 'select')
            <div class="form-group row">
                <label for="{{$item['id']}}"
                       class="col-sm-3 text-end control-label col-form-label">{{$item['label']}}</label>
                <div class="col-sm-9">
                    <select class="select2 form-select shadow-none" name="{{$item['name']}}" id="{{$item['id']}}">
                        <option value="" selected hidden disabled>{{$item['placeholder']}}</option>
                        @foreach($item['data'] as $key=>$item)
                            <option value="{{ $item['key'] }}">{{ $item['value'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
    @endforeach
</div>
