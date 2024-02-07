# Quickstart for Text to Speech

## Setup Environment

### NPM and Javascript Setup

1. Set up enuironment variables:

* To set the `SPEECH_KEY` environment variable, replace _your-key_ with one of the keys for your resource.
* To set the `SPEECH_REGION` environment variable, replace _your-region_ with one of the regions for your resource.

```bash
export SPEECH_KEY=your-key
export SPEECH_REGION=your-region
```


## Synthesize to file output

1. Install the Speech SDK for Javascript

```bash
npm install microsoft-conitiveservices-speech-sdk
```

2. Copy the following code into `SpeechSynthesis.js`

```js
(function() {

    "use strict";

    var sdk = require("microsoft-cognitiveservices-speech-sdk");
    var readline = require("readline");

    var audioFile = "YourAudioFile.wav";
    // This example requires environment variables named "SPEECH_KEY" and "SPEECH_REGION"
    const speechConfig = sdk.SpeechConfig.fromSubscription(process.env.SPEECH_KEY, process.env.SPEECH_REGION);
    const audioConfig = sdk.AudioConfig.fromAudioFileOutput(audioFile);

    // The language of the voice that speaks.
    speechConfig.speechSynthesisVoiceName = "en-US-JennyNeural"; 

    // Create the speech synthesizer.
    var synthesizer = new sdk.SpeechSynthesizer(speechConfig, audioConfig);

    var rl = readline.createInterface({
      input: process.stdin,
      output: process.stdout
    });

    rl.question("Enter some text that you want to speak >\n> ", function (text) {
      rl.close();
      // Start the synthesizer and wait for a result.
      synthesizer.speakTextAsync(text,
          function (result) {
        if (result.reason === sdk.ResultReason.SynthesizingAudioCompleted) {
          console.log("synthesis finished.");
        } else {
          console.error("Speech synthesis canceled, " + result.errorDetails +
              "\nDid you set the speech resource key and region values?");
        }
        synthesizer.close();
        synthesizer = null;
      },
          function (err) {
        console.trace("err - " + err);
        synthesizer.close();
        synthesizer = null;
      });
      console.log("Now synthesizing to: " + audioFile);
    });
}());
```


3. In SpeechSynthesis.js, optionally you can rename YourAudioFile.wav to another output file name.

4. To change the speech synthesis language, replace en-US-JennyNeural with another supported voice.

All neural voices are multilingual and fluent in their own language and English. For example, if the input text in
English is "I'm excited to try text to speech" and you set es-ES-ElviraNeural, the text is spoken in English with a
Spanish accent. If the voice doesn't speak the language of the input text, the Speech service doesn't output synthesized audio.

Run your console application to start speech synthesis to a file:

```bash
node SpeechSynthesis.js
```

## Github Azure Conitive Services Speech SDK Examples

[coginitive-services-speech-sdk](https://github.com/Azure-Samples/cognitive-services-speech-sdk)



