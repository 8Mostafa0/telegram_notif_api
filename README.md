# Telegram Notification API

## Overview
The `telegram_notif_api` is a simple PHP-based project that allows you to receive notifications from other applications and send them to a Telegram bot. It provides a basic framework for processing incoming notifications and sending messages to a specified Telegram chat.

## Features
- Receives notification data as JSON input
- Supports authentication with username and password (though this is not recommended for security reasons)
- Sends notification messages to a specified Telegram chat

## Usage
To use the `telegram_notif_api`, you'll need to follow these steps:

1. **Set up a Telegram Bot**: Use the BotFather to create a new Telegram bot and obtain the bot token.
2. **Configure the API**: Update the `$BOT_TOKEN` and `$CHAT_ID` variables in the `API.php` file with your bot token and the chat ID you want to send notifications to.
3. **Set up the Webhook**: Update the `$URL` variable in the `API.php` file with the correct URL for your deployment, then open the URL `https://api.telegram.org/bot{BOT_TOKEN}/setWebhook?url={PATH_TO_API.PHP}` to set the webhook for your Telegram bot.
4. **Send Notifications**: Modify your other applications to send notification data to the `API.php` file in the format `{ "username": "", "password": "", "messsage": "" }`. The API will then send the message to the specified Telegram chat.

Here's an example of how you can send a notification using a simple cURL request:

```bash
curl -X POST \
  -H "Content-Type: application/json" \
  -d '{"username":"", "password":"", "messsage":"This is a test notification."}' \
  https://your-domain.com/API.php
