<label class="form-label" for="exampleInputEmail1">Thành viên phụ trách</label>
<select name="member_id" class="form-select">
    @foreach($members as $member)
        <option value="{{$member->id}}"
                @if($member_id === $member->id) selected @endif>{{ $member->name }}</option>
    @endforeach
</select>
