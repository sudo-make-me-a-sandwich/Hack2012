# Clockwork SMS API Wrapper for PHP

This wrapper lets you interact with Clockwork without the hassle of having to create any XML or make HTTP calls.

## What's Clockwork?

The mediaburst SMS API is being re-branded as Clockwork. At the same time we'll be launching some exciting new features
and these shiny new wrappers.

The terms Clockwork and "mediaburst SMS API" refer to exactly the same thing.

### Prerequisites

* A [Clockwork][2] account

## Usage

Require the Clockwork library:

	require 'class-Clockwork.php';

### Sending a message

    $clockwork = new Clockwork( $API_KEY );
    $message = array( 'to' => '441234567891', 'message' => 'This is a test!' );
    $result = $clockwork->send( $message );

### Sending multiple messages

We recommend you use batch sizes of 500 messages or fewer. By limiting the batch size it prevents any timeouts when sending.

    $clockwork = new Clockwork( $API_KEY );
    $messages = array( 
      array( 'to' => '441234567891', 'message' => 'This is a test!' ),
      array( 'to' => '441234567892', 'message' => 'This is a test 2!' )
    );
    $results = $clockwork->send( $messages );


### Handling the response

The responses come back as arrays, these contain the unique Clockwork message ID, whether the message worked (`success`), and the original SMS so you can update your database.

    Array
    (
        [id] => VE_164732148
        [success] => 1
        [sms] => Array
            (
                [to] => 441234567891
                [message] => This is a test!
            )

    )

If you send multiple SMS messages in a single send, you'll get back an array of results, one per SMS.

The result will look something like this:

    Array
    (
        [0] => Array
            (
                [id] => VI_143228951
                [success] => 1
                [sms] => Array
                    (
                        [to] => 441234567891
                        [message] => This is a test!
                    )

            )

        [1] => Array
            (
                [id] => VI_143228952
                [success] => 1
                [sms] => Array
                    (
                        [to] => 441234567892
                        [message] => This is a test 2!
                    )

            )

    )

If a message fails, the reason for failure will be set in `error_code` and `error_message`.  

For example, if you send to invalid phone number "abc":

    Array
    (
        [error_code] => 10
        [error_message] => Invalid 'To' Parameter
        [success] => 0
        [sms] => Array
            (
                [to] => abc
                [message] => This is a test!
            )

    )

### Checking your credit

Check how many SMS credits you currently have available:

    $clockwork = new Clockwork( $API_KEY );
    print $clockwork->checkCredit();
    
### Handling Errors

The Clockwork wrapper will throw a `ClockworkException` if the entire call failed.

    try 
    {
      $clockwork = new Clockwork( 'invalid_key' );
      $message = array( 'to' => 'abc', 'message' => 'This is a test!' );
      $result = $clockwork->send( $message );
    }
    catch( ClockworkException $e )
    {
      print $e->getMessage();
      // Invalid API Key
    }

### Advanced Usage

This class has a few additional features that some users may find useful, if these are not set your account defaults will be used.

### Optional Parameters

*   $from [string]

    The from address displayed on a phone when they receive a message

*   $long [boolean]  

    Enable long SMS. A standard text can contain 160 characters, a long SMS supports up to 459.

*   $truncate [nullable boolean]  

    Truncate the message payload if it is too long, if this is set to false, the message will fail if it is too long.

*	$invalid_char_action [string]

	What to do if the message contains an invalid character. Possible values are
	* error			 - Fail the message
	* remove		 - Remove the invalid characters then send
	* replace		 - Replace some common invalid characters such as replacing curved quotes with straight quotes

### Setting Options

#### Global Options

Options set on the API object will apply to all SMS messages unless specifically overridden.

In this example both messages will be sent from Clockwork:

    $options = array( 'from' => 'Clockwork' );
    $clockwork = new Clockwork( $API_KEY, $options );
    $messages = array( 
      array( 'to' => '441234567891', 'message' => 'This is a test!' ),
      array( 'to' => '441234567892', 'message' => 'This is a test 2!' )
    );
    $results = $clockwork->send( $messages );

#### Per-message Options

Set option values individually on each message.

In this example, one message will be from Clockwork and the other from 84433:

    $clockwork = new Clockwork( $API_KEY, $options );
    $messages = array( 
      array( 'to' => '441234567891', 'message' => 'This is a test!', 'from' => 'Clockwork' ),
      array( 'to' => '441234567892', 'message' => 'This is a test 2!', 'from' => '84433' )
    );
    $results = $clockwork->send( $messages );

# License

This project is licensed under the ISC open-source license.

A copy of this license can be found in License.txt.

# Contributing

If you have any feedback on this wrapper drop us an email to hello@clockworksms.com.

The project is hosted on GitHub at https://github.com/mediaburst/clockwork-php.
If you would like to contribute a bug fix or improvement please fork the project 
and submit a pull request.

[1]: https://nuget.org/packages/Clockwork/
[2]: http://www.clockworksms.com/