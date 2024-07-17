<form action="{{ url('/profile/updatedata/1') }}" method="post">
    @csrf

    <input type="hidden" name="idperson" value="1">
    <input type="hidden" name="first_name" value="sample">
    <input type="hidden" name="fullname" value="sample saja">
    <input type="hidden" name="last_name" value="saja">
    <input type="hidden" name="gender" value="male">
    <input type="hidden" name="email" value="sample@email.com">
    <input type="hidden" name="birth_date" value="2004-07-12">
    <input type="hidden" name="phone" value="0876877982">
    <input type="hidden" name="address" value="Jl. XXX">
    <input type="hidden" name="city" value="5">
    <input type="hidden" name="state" value="Indonesia">
    
    <input type="hidden" name="currentunit" value="1">
    <input type="hidden" name="jointdate" value="2004-07-12">
    <input type="hidden" name="idjabatan" value="2">
    <input type="hidden" name="nama" value="ridho">
    <input type="hidden" name="aktif" value="1">

    <button type="submit">Submit</button>
    </form>