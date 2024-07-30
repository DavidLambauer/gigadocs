<?php /** @noinspection PhpArgumentWithoutNamedIdentifierInspection */
declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

// Current Script:
// Iterate over the topics and wirte the docs


//



$emptyDocs = [
    'api reference',
    'basic configuration',
    'best practices for extension development',
    'best practices for secure development',
    'brief explanation of each component',
    'cache management',
    'caching in magento 2',
    'case studies of problem solving in magento 2',
    'continious integration continious deployment',
    'cli commands',
    'css preprocessing',
    'data interfaces and models',
    'database access and orm',
    'developing extensions in magento 2',
    'diagrams to visually represent the architecture',
    'directory structure',
    'email templates',
    'events',
    'extension use cases',
    'functional testing',
    'glossary of terms',
    'graphql apis',
    'how to contribute to the magento 2 community',
    'how to get help and support',
    'how to use and extend apis',
    'i18n',
    'indexers',
    'installation guide',
    'integration testing',
    'javascript in magento 2',
    'javascript testing',
    'knockoutjs integration',
    'layouts blocks and templates',
    'logging',
    'magento 2 coding standards',
    'module development',
    'observers',
    'overview of magento 2',
    'overview of magento 2 apis',
    'overview of magento 2 development',
    'overview of the architectural components',
    'performance best practices',
    'performance testing',
    'plugins',
    'recommended development workflows',
    'reporting security issues',
    'requirejs',
    'rest apis',
    'rest apis soap apis',
    'scalability options and recommendations',
    'search',
    'security features in magento 2',
    'server setup and configuration',
    'service contracts',
    'soap apis',
    'static testing',
    'testing tools',
    'the magento application',
    'the magento application and service contracts',
    'theme development',
    'troubleshooting common installation issues',
    'ui components',
    'unit testing',
    'versions and updates',
    'web api',
    'widgets',
    'working with adminhtml',
];

$client = OpenAI::client('');

foreach ($emptyDocs as $emptyDoc) {

    $docName = str_replace(' ', '-', $emptyDoc) . '.md';
    echo "Creating $docName\n";
    shell_exec(<<<EOL
curl https://api.openai.com/v1/chat/completions \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer BEARER" \
  -d '{
  "model": "gpt-3-turbo",
  "messages": [
    {
      "role": "user",
      "content": "Create the documentation for Magento 2 $emptyDoc. The format must be markdown. The text should be written in a professional, informative, and instructional tone, indicative of technical writing. The voice is authoritative and knowledgeable, drawing on specific and concrete examples to illustrate the concepts being discussed. The text is intended for an audience that has some familiarity with programming, specifically PHP and Magento 2, as it uses jargon and concepts that would be difficult for a novice or non-technical reader to understand. Includes concrete examples and code snippets to illustrate the concepts, making it easier for readers to understand the information."
    }
  ],
  "temperature": 0.8,
  "max_tokens": 32768
}'  | jq -r '.choices[0].message.content' > $docName
EOL
    );
    echo "Created $docName\n";
}

