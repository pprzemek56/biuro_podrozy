@if(Route::current()->getName() == 'offer')
    <div id="formularz" method="POST" action="{{route('offer')}}">
        <form>
            @csrf
            <div class="data">
                <label for="datepicker" style="font-weight: bold">Od kiedy?</label>
                <div style="clear:both;"></div>
                <input name="od_kiedy" type="text" class="datepicker" placeholder="Od kiedy...">
            </div>
            <div class="data">
                <label for="datepicker" style="font-weight: bold">Do kiedy?</label>
                <div style="clear:both;"></div>
                <input name="do_kiedy" type="text" class="datepicker" placeholder="Do kiedy...">
            </div>
            <div class="data">
                <button type="submit" class="btn btn-primary">Szukaj</button>
            </div>
            <div style="clear:both;"></div>
        </form>
    </div>
    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker();
        });
    </script>
@else
    <div id="formularz" method="POST" action="#">
        <form>
            <div class="data">
                <label for="datepicker" style="font-weight: bold">Od kiedy?</label>
                <div style="clear:both;"></div>
                <input name="od_kiedy" type="text" class="datepicker" placeholder="Od kiedy...">
            </div>
            <div class="data">
                <label for="datepicker" style="font-weight: bold">Do kiedy?</label>
                <div style="clear:both;"></div>
                <input name="do_kiedy" type="text" class="datepicker" placeholder="Do kiedy...">
            </div>
            <div class="data">
                <button type="submit" class="btn btn-primary">Szukaj</button>
            </div>
            <div style="clear:both;"></div>
        </form>
    </div>
    <script type="text/javascript">
        $(function() {
            $('.datepicker').datepicker();
        });
    </script>
@endif

