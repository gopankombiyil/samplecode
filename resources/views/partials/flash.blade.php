 @if (Session::has('message'))
        <div class="flash alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('message') }}</p>		
        </div>
        
@endif


    