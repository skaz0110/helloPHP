@extends('layout')

@section('styles')
    <!-- デフォルトのスタイルシート -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- ブルーテーマの追加スタイルシート -->
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
<form class="formadd" action="/toppage" method="post">
    @csrf
        <div class="row">
            <div class="col-xs-2">
                <div class="form-group" >
                    <label for="exampleInputEmail1">食材</label>
                    <input type="text"　name="food" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">個数</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="number">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="period">期限</label>
                <input type="text" class="form-control" name="period" id="period" value="{{ old('period') }}" />
              </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">カテゴリ</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option>野菜</option>
                        <option>調味料</option>
                        <option>飲み物</option>
                        <option>肉</option>
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">メモ</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="memo"></textarea>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary">追加</button>
            </div>
        </div>    
    </form>
@endsection

@section('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
        flatpickr(document.getElementById('period'), {
            locale: 'ja',
            dateFormat: "Y/m/d",
            minDate: new Date()
            });
</script>
@endsection