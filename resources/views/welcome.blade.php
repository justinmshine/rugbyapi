@include('includes/head')
    <h2 class="login-header">Shine Rugby Shirts CMS</h2>
    <form class="login-form" method="post" action="login">
        @csrf
        <label for="email">Email:</label><br>
        <input id="email" name="email" type="email"><br>
        <label for="password">Password:</label><br>
        <input id="password" name="password" type="password"><br><br>
        <input type="submit" value="Submit">
    </form>
@include('includes/footer')

