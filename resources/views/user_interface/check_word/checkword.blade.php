@extends('user_interface.layouts.user_header')
@section('content')

<style type="text/css">
.cke_chrome{
	visibility: hidden;
}
.word-incorrect{
	color: red;
}
.word-correct{
	color:green;
}
.word-strike {
    color: gray;
    text-decoration: line-through;
}
#inputContainer{
    border: 1px solid #ccc;
    padding: 5px;
    overflow: auto;
    background-color: beige;
    min-height: 100px;
    border-radius: 5px;
    font-size: 18px;
    display: -webkit-box;
}
.editable{
    margin-left: 10px;
    height: 11px;
}
.inputContainer{
    border: 1px solid #ccc;
    padding: 5px; overflow: auto;
    background-color: beige;
    min-height: 100px;
    border-radius: 5px;
    font-size: 18px;
    display: -webkit-inline;
}

</style>


	<div class="codes agileitsbg5">
		<div class="container">
			<div class="grid_3 grid_5 w3-agileits">
				<h3 class="w3ls-hdg">Check word</h3><br>
					<div class="inputContainer" id="inputContainer">
                        @foreach($checkword as $checkword)
                            <?php
                                $str = $checkword->text;
                                $arr =  explode(" ", $str);
                            ?>
                        @endforeach
                        @foreach($arr as $arr)
    		                  <div class="editable quick" name="{{$arr}}-{{$arr}}" id="editable1" p="false" placeholder="Please TYPE here" ></div>
                        @endforeach
                    </div>
                    <div class="total-words-count">point</div>
				<div class="clearfix">
				</div>

			</div>
		</div>
	</div>

    @stop