<style>
    .msg-succes{
        background-color: #4bbb8b;
    }
    .msg-danger{
        background-color: #830e0e;
    }
    .msg-flash{
        position: fixed;
        bottom: 0px;
        z-index: 99;
        color: white;
        margin: 20px 50px;
        padding: 30px;
        border-radius: 10px;
    }
</style>
@if (session()->has('status'))

<div class="alert alert-success msg-flash {{session()->get('class')}}" role="alert">
    <strong>{{session()->get('status')}}</strong>
</div>
@endif
