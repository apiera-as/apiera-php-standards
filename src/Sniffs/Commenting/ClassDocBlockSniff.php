<?php

declare(strict_types=1);

namespace Apiera\PhpStandards\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Sniff to enforce required tags in class docblocks.
 *
 * @package PhpStandards
 * @author  fredrik-tveraaen <fredrik.tveraaen@apiera.io>
 * @since   1.0.0
 */
final class ClassDocBlockSniff implements Sniff
{
    /**
     * Required tags that must exist in class docblock.
     *
     * @var array<string>
     */
    private array $requiredTags = ['@author', '@since'];

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array<int>
     */
    public function register(): array
    {
        return [T_CLASS];
    }

    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @param File    $phpcsFile The PHP_CodeSniffer file where the token was found.
     * @param integer $stackPtr  The position of the current token in the token stack.
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();

        // Find the class comment
        $commentEnd = $phpcsFile->findPrevious(T_DOC_COMMENT_CLOSE_TAG, ($stackPtr - 1));
        if ($commentEnd === false) {
            $phpcsFile->addError(
                'Missing class doc comment',
                $stackPtr,
                'Missing'
            );
            return;
        }

        $commentStart = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, ($commentEnd - 1));
        $comment = trim($phpcsFile->getTokensAsString($commentStart, ($commentEnd - $commentStart + 1)));

        // Check for required tags
        foreach ($this->requiredTags as $tag) {
            if (strpos($comment, $tag) === false) {
                $phpcsFile->addError(
                    sprintf('Missing required tag "%s" in class doc comment', $tag),
                    $stackPtr,
                    'MissingTag'
                );
            }
        }

        // Verify @author format
        if (preg_match('/@author\s+[^<]*<[^>]+>/', $comment) === 0) {
            $phpcsFile->addError(
                'Author tag must be in format "@author name <email>"',
                $stackPtr,
                'InvalidAuthorFormat'
            );
        }

        // Verify @since format (semantic version)
        if (preg_match('/@since\s+\d+\.\d+\.\d+/', $comment) === 0) {
            $phpcsFile->addError(
                'Since tag must be in semantic version format (e.g., 1.0.0)',
                $stackPtr,
                'InvalidSinceFormat'
            );
        }
    }
}