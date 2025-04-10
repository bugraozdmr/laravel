<div id="sidepanel">
    <div id="profile">
        <div class="wrap">
            <img id="profile-img" src="{{ asset('default-images/default.jpg') }}" class="online" alt="" />
            <p>{{ auth()->user()->name }}</p>
            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
            <div id="status-options">
                <ul>
                    <li id="status-online" class="active"><span class="status-circle"></span>
                        <p>Online</p>
                    </li>
                    <li id="status-away"><span class="status-circle"></span>
                        <p>Away</p>
                    </li>
                    <li id="status-busy"><span class="status-circle"></span>
                        <p>Busy</p>
                    </li>
                    <li id="status-offline"><span class="status-circle"></span>
                        <p>Offline</p>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
       <hr> 
    <div id="contacts">
        <ul>
            @forelse($users as $user)
                <li class="contact" data-id="{{ $user->id }}">
                    <div class="wrap">
                        <span class="contact-status {{ $user->is_online ? 'online' : 'offline' }}"></span>
                        <img src="{{ asset('default-images/default.jpg') }}" alt="{{ $user->name }}" />
                        <div class="meta">
                            <p class="name">{{ $user->name }}</p>
                            <p class="preview">{{ $user->email }}</p>
                        </div>
                    </div>
                </li>
            @empty
                <li style="text-align: center" class="no-user-found">No user found</li>
            @endforelse
        </ul>             
    </div>
    <div style="text-align: center; margin-top: 12px">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #ff4d4d; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>
</div>