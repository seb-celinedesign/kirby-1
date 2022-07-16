<template>
	<k-field :input="_uid" v-bind="$props" class="k-uuid-field">
		<template #options>
			<k-options-dropdown
				:text="$t('copy')"
				icon="blank"
				:options="[
					{ text: 'UUID', option: 'uuid' },
					{ text: 'Permalink', option: 'permalink' }
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
	props: {
		icon: {
			type: String,
			default: "badge"
		},
		copy: {
			type: String
		}
	},
	methods: {
		focus() {
			this.$refs.input.focus();
		},
		onCopy(action) {
			console.log(action);
			switch (action) {
				case "uuid":
					this.$helper.clipboard.write("uuid");
					this.$store.dispatch("notification/success", "UUID copied!");
					break;
				case "permalink":
					this.$helper.clipboard.write("permalink");
					this.$store.dispatch("notification/success", "Permalink copied!");
					break;
			}
		}
	}
};
</script>
