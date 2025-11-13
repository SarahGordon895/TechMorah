Soketi + Laravel (quickstart)

This project uses the Pusher protocol for broadcasting. The `pusher/pusher-php-server` client is installed and `config/broadcasting.php` is configured for a local Soketi server.

Quick steps to run Soketi locally using Docker Compose:

1. Start Soketi + Redis

```bash
# from the project root
docker compose -f docker-compose.soketi.yml up -d
```

2. Add these keys to your `.env` (example):

```
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=laravel
PUSHER_APP_KEY=laravel
PUSHER_APP_SECRET=secret
PUSHER_HOST=127.0.0.1
PUSHER_PORT=6001
PUSHER_SCHEME=http
```

3. Trigger a test broadcast from Laravel:

- Open in a browser or curl:

```bash
# assumes local web server (php artisan serve) or your vhost
curl http://localhost/broadcast-test
```

You should see `Broadcast dispatched` returned. If Soketi is running and your `.env` keys are set, the event will be sent to Soketi.

4. Listen from a JS client (example using Laravel Echo + Pusher JS):

Install client libs (in project if using frontend build):

```bash
npm install --save laravel-echo pusher-js
```

Example client code:

```js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
  broadcaster: 'pusher',
  key: process.env.MIX_PUSHER_APP_KEY || 'laravel',
  wsHost: process.env.MIX_PUSHER_HOST || '127.0.0.1',
  wsPort: process.env.MIX_PUSHER_PORT || 6001,
  forceTLS: false,
  disableStats: true,
  enabledTransports: ['ws', 'wss']
});

echo.channel('test-channel').listen('.test-event', (e) => {
  console.log('Received event', e);
});
```

Notes:
- This quickstart is for local development only. For production, secure the connection (TLS), set strong secrets, and configure authentication for private/presence channels.
- If you prefer a hosted solution, use Pusher (pusher.com) instead of running Soketi locally.
