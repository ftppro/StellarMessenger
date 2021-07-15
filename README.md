# Stellar Messenger
Send **164 text characters** in one Stellar transaction, for just **.051 XLM** (about **1 cent**). This website uses the **Stellar Smart SDK** (described below), which can be used to create **Shopping Carts**, **Tweets**, and **Discussion Forums** on the Stellar blockchain.

Previously, the **Memo** field was the only way to include text with your payment. The Memo field only allows 32 characters per transaction, so it would take 6 transactions to send 164 characters. It takes 6 seconds to send each transaction to the Stellar blockchain, so it would take **42 seconds** to do what this website does in just **1 second**. This website uses **micro-payments** to send text (this is described below).

### Use on Test Network or Main Network
The checkbox on the upper-left corner of the page lets you use the **Test Network**, which is free to use. However, the **Test Network** can be ten times slower than the **Main Network**, because it often requires multiple **retries** to send a transaction. When using the **Main Network**. I have not encountered ***any*** retries. 

This website allows up to 20 retries for a transaction to be sent. On the **Test Network**, the most retries I encountered was **6**, which took about 60 seconds to send one transaction.

The **transaction fee** to send text on the **Main Network** is only $0.000001 per character (the rest of the **transaction cost** is sent to the **Receiver**), so you can send **16k of text** (100 messages with 164 characters each) for a fee of just **2 cents**.

### Message Sender Account
There are two ways to select a Stellar account that messages will be sent ***from***:
1. **Private Key:** After entering your **Private Key** for a Stellar Account, click **[Select Message Sender Account]**, and the **Balance** for that account will be shown. 
This website will then automatically **sign** the transaction when you click **[Send Message]**.
You should only use a ***new*** Stellar account with just **1.5 XLM** (which is the **1 XLM** minimum balance, plus **.5 XLM** to send messages), for the **Message Sender Account**.
2. [**Rabet Chrome Extension**](https://chrome.google.com/webstore/detail/rabet/hgmoaheomcjnaheggkfafnjilfcefbmo): This **Chrome Extension** lets you select a Stellar Account without disclosing your **Private Key**. When you click **[Send Message]**, you will be prompted to **sign** the transaction on the **Rabet popup**.
