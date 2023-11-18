<!DOCTYPE html>
<html lang="en">
    @include('theme.web.head')
    <body>
        <div class="slide"> 
            @include('theme.web.header')
                {{ $slot }}
            </div>
            @include('theme.web.footer')
        </div>
        @include('theme.web.js')
    </body>
</html>