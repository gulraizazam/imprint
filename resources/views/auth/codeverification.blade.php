@extends('web.layout')
@section('content')
<style type="text/css">
	#wrapperverification {
	  font-family: Lato;
	  font-size: 1.5rem;
	  text-align: center;
	  box-sizing: border-box;
  	  color: #333;
  	  padding:80px;
	}
  
  	#dialogverification {
	    border: solid 1px #ccc;
	    margin: 10px auto;
	    padding: 20px 30px;
	    display: inline-block;
	    box-shadow: 0 0 4px #ccc;
	    background-color: #FAF8F8;
	    overflow: hidden;
	    position: relative;
	    max-width: 530px;
    }
    
    #formverification {
      width: 100%;
      margin: 25px auto 0;
    }
      
    #formverification button {
	    margin:  30px 0 50px;
	    width: 50%;
	    padding: 12px;
	    background-color:#28b293;
	    border: none;
	    color: white;
	    text-transform: uppercase;
    }

</style>
<div class="col-12 col-sm-12">
	<div id="wrapperverification">
	  <div id="dialogverification">
	    
	    <h3>Please enter the 6-digit verification code we sent via SMS:</h3>
	    <span>(we want to make sure it's you before we contact our movers)</span>
	    <div id="formverification">
        <form action="{{url('verifyPhone')}}" method="post">
          @csrf
          <input type="text" class="verificationinput" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code[]" />
          <input type="text" class="verificationinput" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code[]"/>
          <input type="text" class="verificationinput" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code[]"/>
          <input type="text" class="verificationinput" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code[]"/>
          <input type="text" class="verificationinput" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="code[]"/>
         
        <button class="btn btn-primary btn-embossed">Verify</button>
        </form>
	      
	    </div>
	    
	  </div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
  'use strict';

  var body = $('body');

  function goToNextInput(e) {
    var key = e.which,
      t = $(e.target),
      sib = t.next('input');

    if (key != 9 && (key < 48 || key > 57)) {
      e.preventDefault();
      return false;
    }

    if (key === 9) {
      return true;
    }

    if (!sib || !sib.length) {
      sib = body.find('input').eq(0);
    }
    sib.select().focus();
  }

  function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
      return true;
    }

    e.preventDefault();
    return false;
  }
  
  function onFocus(e) {
    $(e.target).select();
  }

  body.on('keyup', 'input', goToNextInput);
  body.on('keydown', 'input', onKeyDown);
  body.on('click', 'input', onFocus);

})
</script>

@endsection