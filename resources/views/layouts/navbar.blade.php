
<!-- Navbar -->
<ul class="nbar">
  <li><a id="neighborhoods" href="/manage/neighborhoods">Neighborhoods</a></li>
  <li><a id="businesses" href="/manage/businesses">Businesses</a></li>
  <li><a id="locations" href="/manage/locations">Locations</a></li>
  <li><a id="specialties" href="/manage/specialties">Specialties</a></li>
  <li><a id="payment_options" href="/manage/payment_options">Payment Options</a></li>
</ul>

<script type="text/javascript">
  var root = document.getElementById('{{$section}}'); 
  console.log({{$section}});
  root.className += 'active';
</script>