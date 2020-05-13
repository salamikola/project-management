<div class="col-md-3 col-lg-3 col-xl-3 col-sm-12 sidebar">
    <center>
        <br> 
        <br>
<div class="recent"> 
            <br>           
  <button type="button" class="btn btn-primary recents"> Most Recents Projects </button>
    <ul class="list-group recents">
        <br>
         @foreach ($recentProjects as $recentProject)
         <li class="list-group-item"> <a href="{{action('TaskController@index', ['id' => $recentProject->id])}}"> {{$recentProject->title}} </a>  </li>
         @endforeach
         </ul>
</div>

<div class="total"> 
  <br>
  <button type="button" class="btn btn-primary total">Total Projects </button>
  <br>
  <p class="total"> Total No of {{count($projects)}} projects has been created. </p>
 
</div>

<div class="ongoing"> 
<br>
<button type="button" class="btn btn-primary ongoing">Ongoing Projects </button>
<p class="ongoing"> Total No of {{count($ongoingProjects)}} projects are currently ongoing. </p>

<ul class="list-group ongoing">
         @foreach ($ongoingProjects as $ongoingProject)
         <li class="list-group-item">  <a href="#"> {{$recentProject->title}} </a>  </li>
         @endforeach
         </ul>

</div>

<div class="pending">
<br>
<button type="button" class="btn btn-primary pending">Pending Projects </button>
<p class="pending"> Total No of {{count($pendingProjects)}} projects are currently pending. </p>
<ul class="list-group pending">
         @foreach ($pendingProjects as $pendingProject)
         <li class="list-group-item">   <a href="#"> {{$pendingProject->title}} </a>  </li>
         @endforeach
         </ul>
</div>

<div class="completed">
<br>
<button type="button" class="btn btn-primary completed">Completed Projects </button>
<br>
  <p class="completed"> Total No of {{count($completedProjects)}} projects have been completed. </p>
 
  <ul class="list-group completed">
         @foreach ($completedProjects as $completedProject)
    <li class="list-group-item"> <a href="#"> {{$completedProject->title}} </a>  </li>
         @endforeach
         </ul>

</div>

<div class="due"> 
<br>
<button type="button" class="btn btn-danger due"> <img src="{{ asset('image/alert.png') }}" width="20" height="20"> Projects That Due Today</button>
  <p class="due">We have a total no of {{count($dueProjects)}} project that dues today. Check it Now!! </p>
  
  <ul class="list-group due"> 
         @foreach ($dueProjects as $dueProject)
         <li class="list-group-item"> <a href="#"> {{$dueProject->title}} </a>  </li>
         @endforeach
         </ul>

</div>
  

</center>
    </div>