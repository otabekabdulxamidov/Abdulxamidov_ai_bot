Python 3.12.6 (tags/v3.12.6:a4a2d2b, Sep  6 2024, 20:11:23) [MSC v.1940 64 bit (AMD64)] on win32
Type "help", "copyright", "credits" or "license()" for more information.
>>> from telegram import Update
... from telegram.ext import Updater, CommandHandler, CallbackContext
... import logging
... 
... # Bot tokeni va guruh ID
... TOKEN = "7678052784:AAFghXSncDLijXCaY6eu8Wvj45MmUfupSWA"
... GROUP_ID = -2395132790  # Guruhingiz yoki kanalingiz ID'sini yozing
... ADMIN_USERNAME = "Abdulxamidov_otabek"  # Admin username
... 
... # Log yozish
... logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s', level=logging.INFO)
... 
... def check_membership(update: Update, context: CallbackContext):
...     user_id = update.message.from_user.id
...     try:
...         chat_member = context.bot.get_chat_member(GROUP_ID, user_id)
...         if chat_member.status in ["member", "administrator", "creator"]:
...             update.message.reply_text("✅ Siz guruhda bor ekansiz! Botdan foydalanishingiz mumkin.")
...         else:
...             update.message.reply_text("❌ Iltimos, avval guruhimizga qo‘shiling: https://t.me/photocraft_uz")
...     except:
...         update.message.reply_text("❌ Guruhga qo‘shiling: https://t.me/photocraft_uz")
... 
... def start(update: Update, context: CallbackContext):
...     check_membership(update, context)
... 
... def admin(update: Update, context: CallbackContext):
...     update.message.reply_text(f"📞 Admin bilan bog‘lanish: @{ADMIN_USERNAME}")
... 
... def main():
...     updater = Updater(TOKEN, use_context=True)
...     dispatcher = updater.dispatcher
... 
...     dispatcher.add_handler(CommandHandler("start", start))
...     dispatcher.add_handler(CommandHandler("admin", admin))
... 
...     updater.start_polling()
...     updater.idle()
... 
... if __name__ == '__main__':
...     main()
