<template>
	<k-field
		:input="_uid"
		v-bind="$props"
		:help="'&rarr; ' + permalink"
		class="k-uuid-field"
	>
		<template #options>
			<k-options-dropdown
				:text="$t('copy')"
				icon="copy"
				:options="[
					{ text: 'UUID', click: 'uuid' },
					{ text: 'Permalink', click: 'permalink' }
				]"
				@action="onCopy"
			/>
		</template>

		<k-input
			:id="_uid"
			ref="input"
			v-bind="$props"
			theme="field"
			type="text"
			v-on="$listeners"
		/>
	</k-field>
</template>

<script>
import { props as Field } from "../Field.vue";
import { props as Input } from "../Input.vue";

/**
 * @example <k-slug-field v-model="slug" name="slug" label="Slug" />
 */
export default {
	mixins: [Field, Input],
	inheritAttrs: false,
	computed: {
		permalink() {
			return this.$urls.site + "/@/" + this.uuid.replace("://", "/");
		},
		uuid() {
			return this.before + this.value;
		}
	},
	methods: {
		focus() {
			this.$refs.input.focus();
		},
		onCopy(action) {
			let value, message;
			switch (action) {
				case "uuid":
					value = this.uuid;
					message = "UUID copied!";
					break;
				case "permalink":
					value = this.permalink;
					message = "Permalink copied!";
					break;
			}

			this.$helper.clipboard.write(value);
			this.$store.dispatch("notification/success", message);
		}
	}
};
</script>
