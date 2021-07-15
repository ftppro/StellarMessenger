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

### Message Receiver Account
The ***default*** **Message Receiver Account** is initially active when this website is opened. This account contains different sample messages for the **Main Network** and **Test Network**.

You can enter any valid Stellar address in the **Message Receiver Account** textbox, and click **[Change Message Receiver Account]**. You should only use a ***new*** Stellar account, with a starting balance of just **1 XLM**.

### Send Message
After you have selected a **Message Sender Account** (by entering a **Private Key**, or by using the **Rabet Chrome Extension**), you may enter a **Message** that contains up to 164 characters. As you are typing, the display will show the **Transaction Cost**, how much will be received by the **Recipient**, and the **Transaction Fee**.

When you click **[Send Message**], if you are using **Rabet** you will be prompted to **sign** the transaction on the **Rabet popup**. If you instead entered your **Private Key**, then this website will automatically **sign** the transaction.

### Stellar Smart SDK
This website uses a file named StellarSmartSDK.js, which includes the following javascript functions and properties:

1. **constructor(sReceiverAddress, bIsTestnet)**: 
Call this function to create a Smart SDK object. For example: 

**var gobjSDK = await new StellarSmartSDK(gsPublicKey_Receiver, gbNetworkType_UseTestNetwork)**

When that object is created, the SDK calls **this.GetMessages()**, which retrieves all the **Payments** from the selected Stellar account.

The **GetMessages()** function then parses the Payment data nto **Messages**, which are placed into an object array named **this.objMessages** which contains the following fields:
  * a. **from**: The Stellar address that sent the message.
  * b. **message**: The message that was sent.
  * c. **timestamp**: The numeric epoch timestamp.
  
Therefore, by just creating a Smart SDK object named **gobjSDK**, you will have an object named **gobjSDK.objMessages** which 
contains all the messages that had been sent to the selected Stellar address.

2. **this.sSender_PrivateKey**:
If the **Rabet Chrome Extension** is ***not*** being used, then you must set this property with the **Private Key** of the **Message Sender Account**.

3. **SendMessage(sMessage)**:
Calling **gobjSDK.SendMessage("This is a test")** will send that message from the selected **Message Sender Account**, 
to the **Message Receiver Account** that was set in the constructor.
If the **Rabet Chrome Extension** is being used, then the SDK will automatically use the Stellar account selected on the **Rabet** popup.
If the **Rabet Chrome Extension** is ***not*** being used, then the SDK will use the **this.sSender_PrivateKey** property to sign the transaction.

### Micro-payments send Text

The **Stellar Smart SDK** uses ***Micro-payments*** to send up to 164 text characters in each transaction.

Each Stellar transaction may contain up to 100 **Operations**, and each **Operation** may contain a **Payment**. 
This SDK combines the **last 4 digits** of all the Payment **Amounts**, to create a **long number** that can represent **text**.

For example, the string "**abc**" can be converted to the following "**bytes32/hex**": 0x616263<br>
(You can confirm this at https://web3-type-converter.onbrn.com)

The Hex string **0x616263** can be converted to this Long Number: **6382179**
(You can confirm this at https://www.rapidtables.com/convert/number/hex-to-decimal.html)

Therefore, the string "**abc**" can be stored on the Stellar network as these two **Payment Amounts**:
* .0006382
* .0000179

