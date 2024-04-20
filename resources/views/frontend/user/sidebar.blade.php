<ul>
    <li class="{{\Request::is('user/dashboard') ? 'active' : ''}}"><a href="{{route('user.dashboard')}}">Tableau de bord</a></li>
    <li class="{{\Request::is('user/order') ? 'active' : ''}}"><a href="{{route('user.order')}}">Commandes</a></li>
    <li class="{{\Request::is('user/address') ? 'active' : ''}}"><a href="{{route('user.address')}}">Adresses</a></li>
    <li class="{{\Request::is('user/account-detail') ? 'active' : ''}}"><a href="{{route('user.account')}}">Détails du compte</a></li>
    <li><a href="{{route('user.logout')}}">Se déconnecter</a></li>
</ul>